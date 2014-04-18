<?php
class Links extends Eloquent {

  public static $rules = array(
      'message'=>'required|alpha|min:2',
      'link'=>'required|alpha|min:2',
      'recipient_id'=>'required|var|min:1',
      'sender_id'=>'required|var|min:1'
      );

  /**
  * The database table used by the model.
  *
  * @var string
  */
  protected $table = 'links';

  protected $message = 'message';

  public function getAuthIdentifier()
  {
    return $this->getKey();
  }

  public static function getLinksByUserId($id) {
    $links = DB::table('links')
             ->select('*')
             ->where("recipient_id", $id)
             ->orderBy('created_at', 'desc')
             ->get();
    return $links;
  }

  public function User()
    {
        return $this->belongsTo('Links');
    }

}
?>
