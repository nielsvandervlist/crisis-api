<?php
namespace App\Params;

use Tychovbh\LaravelCrud\Params\Params;

class RapportParams extends Params
{
    public function reactions(int $crisis_id)
    {
        $this->query
            ->join('reactions', 'reactions.crisis_id', 'rapports.crisis_id')
            ->where('reactions.crisis_id', $crisis_id);
    }
}
