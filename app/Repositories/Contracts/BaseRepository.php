<?php


namespace App\Repositories\Contracts;


 use Illuminate\Database\Eloquent\Model;

 /**
  * Class BaseRepository
  * @package App\Repositories
  */
 abstract class BaseRepository implements IBaseRepository
{
     /**
      * @var Model
      */
     protected $model;

     /**
      * BaseRepository constructor.
      * @param Model $model
      */
     public function __construct(Model $model)
    {
        $this->model = $model;
    }

     /**
      * @param array $data
      * @return mixed
      */
     public function create(array $data)
     {
         $result = $this->model
             ->create($data);

         if($result)
             return $result;

         return null;
     }

     /**
      * @param array $data
      * @param $id
      * @return bool|null
      */
     public function update(array $data, $id): ?bool
     {
        $item = $this->model->where('id', '=', $id)->first();

        $item->fill($data);

        $result = $item->save();

        if(isset($result))
             return $result;

         return null;
     }

     /**
      * @param $id
      * @return mixed
      */
     public function delete($id)
     {
         $result = $this->model
             ->where('id', '=', $id)
             ->first() // first is used to retrieve the model and ifre deleted event to fire the model observer
             ->delete();

         if(isset($result))
             return $result;

         return null;
     }

     /**
      * @param $id
      * @return mixed
      */
     public function find($id)
     {
         $result = $this->model
             ->find($id);

         if($result)
             return $result;

         return null;
     }
 }
