<?php

namespace App\Models;

use App\Enum\BidStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Bid
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $status
 * @property int $bid_address_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BidAddress|null $address
 * @method static \Illuminate\Database\Eloquent\Builder|Bid newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bid newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bid query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereBidAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Bid extends Model
{
    use HasFactory;

    public function default(string $title, string $description, BidAddress $address)
    {
        $this->title = $title;
        $this->description = $description;
        $this->bid_address_id = $address->id;

        $this->status = BidStatusEnum::OPEN();
    }

    public function address(): HasOne
    {
        return $this->hasOne(BidAddress::class);
    }

    public function close(): void
    {
        $this->status = BidStatusEnum::CLOSED();
    }
}
