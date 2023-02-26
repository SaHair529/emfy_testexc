<?php
header('Content-Type: application/json charset=utf-8');

use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\Filters\CatalogElementsFilter;
use League\OAuth2\Client\Token\AccessToken;

require_once __DIR__.'/configs.php';

$request = $_POST ?: json_decode(file_get_contents('php://input'), true);
$leadId = $request['lead_id'] ?? 0;

if ($leadId === 0) {
    http_response_code(400);
    die('Invalid request (without lead_id)');
}


try {
    $apiClient = new AmoCRMApiClient(CLIENT_ID, CLIENT_SECRET, REDIRECT_URI);
    $apiClient->setAccountBaseDomain(SUBDOMAIN);
    $accessToken = new AccessToken(getTokenData());
    $accessToken = getAccessToken();
    $apiClient->setAccessToken($accessToken);

    $responseData = [
        'product_names' => [],
        'product_amount' => 0
    ];

    $lead = $apiClient->leads()->getOne($leadId, ['catalog_elements']);
    $leadCatalogLinks = parseArrayObjectsToArr($lead->getCatalogElementsLinks()->all());
    $filter = new CatalogElementsFilter();
    $filter->setIds(array_column($leadCatalogLinks, 'id'));
    $products = $apiClient->catalogElements(PRODUCTS_CATALOG_ID)->get($filter)->all();
    $responseData['product_amount'] = count($products);
    /** @var \AmoCRM\Models\CatalogElementModel $p */
    foreach ($products as $p) {
        $responseData['product_names'][] = $p->getName();
    }

    echo json_encode($responseData, JSON_UNESCAPED_UNICODE);
}
catch (Exception $ex) {
    http_response_code(500);
    echo json_encode([
        'exception' => $ex->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}