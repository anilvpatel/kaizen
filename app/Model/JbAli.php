<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;


class JbAli extends model{
   protected $table='jb_ali';

   public $primaryKey='id';

   public $timestrap='false';

   protected $fillable=[
     'post_name',
     'post_title',
     'post_content',
     'post_modified',
     'category',
     'location',
     'qualification_required',
     'company',
     'experience_required',
     'salary',
     'starting_date',
     'closing_date',
     'selection_procedure',
     'notification',
     'source_url',
     'apply_url',
     'postcode',
     'street_address',
     'yoast_title',
     'yoast_description',
     'video'
   ];

}
