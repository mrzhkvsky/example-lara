<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BidAddress
 *
 * @property int $id
 * @property string $street
 * @property string $house_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BidAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BidAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BidAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|BidAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BidAddress whereHouseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BidAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BidAddress whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BidAddress whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BidAddress extends Model
{
    use HasFactory;

    public function default(string $street, string $houseNumber)
    {
        $this->street = $street;
        $this->house_number = $houseNumber;
    }
}
