<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\CartCondition;

class OngkirController extends Controller
{
    /**
     * Get cities by province ID
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function cities(Request $request)
    {
        $cities = $this->getCities($request->query('provinceId'));
        
        return response()->json([
            'status' => 200,
            'cities' => $cities
        ]);
    }

    /**
     * Get the shipping cost for a given city and the total weight of items
     *
     * @param Request $request
     * @return array
     */
    public function shippingCost(Request $request)
    {
        $items = \Cart::getContent();
        $totalWeight = $this->calculateTotalWeight($items);

        $destination = $request->query('city');
        return $this->getShippingCost($destination, $totalWeight);
    }

    /**
     * Set the shipping cost and add to the cart
     *
     * @param Request $request
     * @return array
     */
    public function setShipping(Request $request)
    {
        // Remove previous shipping conditions
        \Cart::removeConditionsByType('shipping');

        $items = \Cart::getContent();
        $totalWeight = $this->calculateTotalWeight($items);

        $shippingService = $request->get('shipping_service');
        $destination = $request->get('city_id');

        // Get shipping options
        $shippingOptions = $this->getShippingCost($destination, $totalWeight);

        $selectedShipping = $this->findSelectedShipping($shippingOptions['results'], $shippingService);

        if ($selectedShipping) {
            // Add selected shipping to the cart
            $this->addShippingCostToCart($selectedShipping['service'], $selectedShipping['cost']);

            return [
                'status' => 200,
                'message' => 'Success set shipping cost',
                'data' => ['total' => number_format(\Cart::getTotal())]
            ];
        }

        return [
            'status' => 400,
            'message' => 'Failed to set shipping cost'
        ];
    }

    /**
     * Calculate the total weight of all items in the cart
     *
     * @param $items
     * @return int
     */
    private function calculateTotalWeight($items)
    {
        $totalWeight = 0;
        foreach ($items as $item) {
            $totalWeight += ($item->quantity * $item->associatedModel->weight);
        }

        return $totalWeight;
    }

    /**
     * Find the selected shipping option from the available shipping options
     *
     * @param array $shippingOptions
     * @param string $shippingService
     * @return array|null
     */
    private function findSelectedShipping($shippingOptions, $shippingService)
    {
        foreach ($shippingOptions as $shippingOption) {
            if (str_replace(' ', '', $shippingOption['service']) == $shippingService) {
                return $shippingOption;
            }
        }

        return null;
    }

    /**
     * Add shipping cost to the cart
     *
     * @param string $serviceName
     * @param float $cost
     */
    private function addShippingCostToCart($serviceName, $cost)
    {
        $condition = new CartCondition([
            'name' => $serviceName,
            'type' => 'shipping',
            'target' => 'total',
            'value' => '+' . $cost,
        ]);

        \Cart::condition($condition);
    }
}
