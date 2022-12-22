<?php
namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use App\Clients\Spaces;
use Illuminate\Http\UploadedFile;

trait HasFiles
{
    /**
     * Boot the has files trait for a model.
     *
     * @return void
     */
    public static function bootHasFiles()
    {
        static::saving(function (Model $model) {
            $model->storeFiles();
        });

        static::deleting(function (Model $model) {
            $model->deleteFiles();
        });
    }

    /**
     * Store files
     */
    public function storeFiles()
    {
        if (!$this->files) {
            return;
        }

        foreach ($this->files as $name => $path) {
            if (!request()->hasFile($name)) {
                continue;
            }

            $file = request()->file($name);
            if (!$file || !is_a($file, UploadedFile::class)) {
                continue;
            }

            if ($this->getOriginal($name)) {
                Spaces::delete($this->getOriginal($name));
            }

            $this->{$name} = Spaces::store($path, $file);
        }
    }

    /**
     * Delete files
     */
    public function deleteFiles()
    {
        if (!$this->files) {
            return;
        }

        foreach ($this->files as $name => $path) {
            if ($this->{$name}) {
                Spaces::delete($this->{$name});
            }
        }
    }
}
