<?php
namespace RawCreative\Receiptful;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;

class Api extends GuzzleClient
{

    public static function factory(array $config)
    {
        if (!array_key_exists('apiKey', $config)) {
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

    private static function getDescriptionFromConfig(array $config)
    {
        $data = isset($config['descriptionPath']) && is_readable($config['descriptionPath'])
        ? include $config['descriptionPath']
        : include __DIR__ . '/receiptful-api.php';
        return new Description($data);
    }

    public function receipt($id)
    {
        $command = $this->getCommand('receipt', ['receipt_id' => $id]);

        return $this->execute($command);
    }

    public function resend($id)
    {
        $command = $this->getCommand('resendReceipt', ['receipt_id' => $id]);

        return $this->execute($command);
    }

    public function resendReceipt($id)
    {
        return $this->resend($id);
    }

    public function coupon($id)
    {
        $command = $this->getCommand('coupon', ['coupon_id' => $id]);

        return $this->execute($command);

    }

    public function deleteCoupon($id)
    {
        $command = $this->getCommand('deleteCoupon', ['coupon_id' => $id]);

        return $this->execute($command);

    }

    /**
     * Mark a coupon as used
     * TODO maybe pass params as array?
     * @param  string $id
     * @param  string $reference  Order reference id
     * @param  number $amount     Amount of order
     * @param  string $currency  currency of amount
     * @return array
     */
    public function useCoupon($id, $reference, $amount, $currency)
    {

        $command = $this->getCommand('useCoupon', [
                            'coupon_id' => $id, 
                            'reference' => $reference, 
                            'amount' => $amount, 
                            'currency' => $currency]);

        return $this->execute($command);

    }

}
