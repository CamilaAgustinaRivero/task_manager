<?php

use App\Models\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusEntities extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        //Status crud (nth)
        $statusArray = array(
            [
                'name' => 'Pendiente'
            ],
            [
                'name' => 'En progreso'
            ],
            [
                'name' => 'Realizada'
            ]
        );

        foreach ($statusArray as $st) {
            $status = new Status();
            $status->name = $st['name'];
            $status->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 
    }
}
