<?php
namespace App\Service;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function store($data)
    {
        try {
            $user = User::firstOrCreate($data);
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $user)
    {
        try {
            $user->update($data);
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $user;
    }
}
