<?php
namespace App\Params;

use Tychovbh\LaravelCrud\Params\Params;

class ReactionParams extends Params
{
    /**
     * Search records.
     * @param string $value
     */
    public function search(string $value)
    {
        $this->query->where('name', 'like', '%' . $value . '%');
    }

    /**
     * @param int $user_id
     */
    public function user_id(int $user_id)
    {
        $this->query->join('participants', 'participants.id', 'reactions.participant_id')
            ->where('participants.user_id', $user_id);
    }
}
