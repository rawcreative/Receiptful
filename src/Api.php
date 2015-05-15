<?php
namespace RawCreative\Receiptful;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;

class Api extends GuzzleClient
{

    /**
     * Creates and returns an Api client instance
     *
     * @param array $config
     * @return Api
     * @throws \Exception
     */
    public static function factory(array $config)
    {
        if ( ! array_key_exists('apiKey', $config)) {
            throw new \Exception('Api factory requires $apiKey parameter.');
        }

        $client = new Client([
            'defaults' => [
                'headers' => [
                    'X-ApiKey' => $config['apiKey'],
                ],
            ],
        ], [], $config);

        $description = self::getDescriptionFromConfig($config);

        $apiVersion = isset($config['apiVersion']) ? $config['apiVersion'] : 1;

        return new self($client, $description, ['defaults' => ['api_version' => $apiVersion]]);
    }

    /**
     * Loads the api service description
     *
     * @param array $config
     * @return Description
     */
    private static function getDescriptionFromConfig(array $config)
    {
        $data = isset($config['descriptionPath']) && is_readable($config['descriptionPath'])
            ? include $config['descriptionPath']
            : include __DIR__ . '/receiptful-api.php';

        return new Description($data);
    }

    /**
     * Retrieve a specific receipt
     *
     * @param $id
     * @return \GuzzleHttp\Ring\Future\FutureInterface|mixed|null
     */
    public function receipt($id)
    {
        $command = $this->getCommand('receipt', ['receipt_id' => $id]);

        return $this->execute($command);
    }

    /**
     * Resend a receipt
     *
     * @param $id
     * @return \GuzzleHttp\Ring\Future\FutureInterface|mixed|null
     */
    public function resend($id)
    {
        $command = $this->getCommand('resendReceipt', ['receipt_id' => $id]);

        return $this->execute($command);
    }

    /**
     * @param $id
     * @return \GuzzleHttp\Ring\Future\FutureInterface|mixed|null
     */
    public function resendReceipt($id)
    {
        return $this->resend($id);
    }

    /**
     * Retrieve a specific coupon
     *
     * @param $id
     * @return \GuzzleHttp\Ring\Future\FutureInterface|mixed|null
     */
    public function coupon($id)
    {
        $command = $this->getCommand('coupon', ['coupon_id' => $id]);

        return $this->execute($command);

    }

    /**
     * Delete a coupon
     *
     * @param $id
     * @return \GuzzleHttp\Ring\Future\FutureInterface|mixed|null
     */
    public function deleteCoupon($id)
    {
        $command = $this->getCommand('deleteCoupon', ['coupon_id' => $id]);

        return $this->execute($command);

    }

    /**
     * Mark a coupon as used
     * TODO maybe pass params as array?
     * @param  string $id
     * @param  string $reference Order reference id
     * @param  number $amount    Amount of order
     * @param  string $currency  currency of amount
     * @return array
     */
    public function useCoupon($id, $reference, $amount, $currency)
    {

        $command = $this->getCommand('useCoupon', [
            'coupon_id' => $id,
            'reference' => $reference,
            'amount'    => $amount,
            'currency'  => $currency
        ]);

        return $this->execute($command);

    }

    /**
     * Delete a product
     *
     * @param $id
     * @return \GuzzleHttp\Ring\Future\FutureInterface|mixed|null
     */
    public function deleteProduct($id)
    {
        $command = $this->getCommand('deleteProduct', [
            'product_id' => $id
        ]);

        return $this->execute($command);
    }

}
