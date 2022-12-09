<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public function period(){
    	return $this->belongsTo(Period::class);
    }

    public function duration(){
    	return $this->belongsTo(Period::class);
    }

    public function duaration_span(){
	    return "1 ".$this->duration->singular;
    }

    public function periodic_span(){
	    return $this->intervals." ".$this->period->plural;
    }

    public function interval_seconds()
    {

    }
    public function get_intervals(float $amount, ?float $roi=null)
    {
        $intervals = [];
        $roi = is_null($roi) ? $this->roi : $roi;

        for($i = 0; $i <= $this->intervals; $i++)
        {
            array_push($intervals, [
                'index' => $i,
                'pay_date' => getNextDate('+'.$i." ".$this->period->plural),
                'amount' => $i === 0 ? $amount : amount_from_percent($amount, $roi),
                'roi' => (float)$roi,
                'earned' => $i === 0 ? 1 : 0,
            ]);
        }

        return $intervals;
    }
}
