<?php

namespace App\Repositories;

abstract class Repository
{
    protected $model;

    abstract public function model();

    public function __construct()
    {
        $this->model = app($this->model());
    }


    public function all()
    {
        return $this->model->orderBy('id', 'desc')->get();
    }

    public function paginate($limit = 15)
    {
        return $this->model->orderBy('id', 'desc')->paginate($limit);
    }

    public function getBy($col, $value, $limit = 15)
    {
        return $this->model->where($col, $value)->limit($limit)->orderBy('id', 'desc')->get();
    }

    public function getCountByAuth($col, $value)
    {
        return $this->model->where('user_id', auth()->user()->id)->where($col, $value)->orderBy('id', 'desc')->count();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($model, array $data)
    {
        return $model->update($data);
    }

    public function delete($model)
    {
        return $model->delete();
    }

    public function exists($id)
    {
        return $this->model->where('id', $id)->exists();
    }

    public function uploadFile($path, $file=null)
    {
        if ($file) {
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move("storage/$path", $fileName);
        } else {
            $fileName = "nothing";
        }
        return "storage/$path/" . $fileName;
    }

    public function sessionFlash()
    {
        $session =   \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => ' با موفقیت  انجام شد',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));
        return $session;
    }
}
