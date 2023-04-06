<?php
namespace App\Service;

use App\Models\Comment;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PersonalService
{
    public function store($data)
    {
        try {
            Comment::create($data);
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $commentt)
    {
        try {
            $commentt->update($data);
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $commentt;
    }
}
