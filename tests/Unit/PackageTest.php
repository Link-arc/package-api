<?php

namespace Tests\Unit;

use App\Models\Package;
use Tests\TestCase;

class PackageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_create_package()
    {
        $json = \File::get('packages.json');
        $package = json_decode($json, true);

        $response = $this->post('api/package', $package);

        $responseData = $response->json();

        $packageId = $responseData['id'];

        $response->assertStatus(201);

        Package::find($packageId)->delete();
    }

    public function test_put_package()
    {
        $json = \File::get('packages.json');
        $package = json_decode($json, true);

        $json2 = \File::get('packages-update.json');
        $packageUpdate = json_decode($json2, true);

        $savePackage = Package::create($package);

        $response = $this->put('api/package/'.$savePackage->id, $packageUpdate);

        $response->assertStatus(201);

        $savePackage->delete();
    }

    public function test_patch_package()
    {
        $json = \File::get('packages.json');
        $package = json_decode($json, true);

        $savePackage = Package::create($package);

        $dataUpdated = [
            'transaction_amount'=> 80000,
            'transaction_state' => 'CANCEL',
        ];

        $response = $this->patch('api/package/'.$savePackage->id, $dataUpdated);

        $response->assertStatus(201);

        $savePackage->delete();
    }

    public function test_show_package()
    {
        $json = \File::get('packages.json');
        $package = json_decode($json, true);

        $savePackage = Package::create($package);

        $response = $this->get('api/package/'.$savePackage->id);

        $response->assertStatus(200);

        $savePackage->delete();
    }

    public function test_showAll_package()
    {
        $ids = array();
        $json = \File::get('packages.json');
        $data = json_decode($json, true);

        $package = Package::create($data);
        $ids[] = $package->id;

        $json = \File::get('packages-update.json');
        $data = json_decode($json, true);

        $package = Package::create($data);
        $ids[] = $package->id;

        $response = $this->get('api/package/');

        $response->assertStatus(200);

        foreach ($ids as $id) {
            Package::find($id)->delete();
        }
    }


}
