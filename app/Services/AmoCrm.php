<?php

namespace App\Services;

use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\Client\LongLivedAccessToken;
use AmoCRM\Collections\CustomFieldsValuesCollection;
use AmoCRM\Models\CustomFieldsValues\BaseCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\BaseCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueModels\BaseCustomFieldValueModel;

class AmoCrm
{
    protected $client;

    public function getClient(): AmoCRMApiClient
    {
        if (!$this->client) {
            $token = new LongLivedAccessToken(config('amocrm.access_token'));
            $apiClient = new \AmoCRM\Client\AmoCRMApiClient();
            $apiClient->setAccessToken($token)
                ->setAccountBaseDomain(config('amocrm.domain'));
            $this->client = $apiClient;
        }

        return $this->client;
    }
    public function addCustomField(CustomFieldsValuesCollection $collection, int $id, mixed $value): void
    {
        $model = new BaseCustomFieldValuesModel();
        $model->setFieldId($id);
        $model->setValues(
            (new BaseCustomFieldValueCollection())
                ->add((new BaseCustomFieldValueModel())->setValue($value))
        );
        $collection->add($model);
    }
}
