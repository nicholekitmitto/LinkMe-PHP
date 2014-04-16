<?php
class Links extends Eloquent {

  public static $rules = array(
      'message'=>'required|alpha|min:2',
      'link'=>'required|alpha|min:2',
      'recipient_id'=>'required|var|min:1'
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

}
?>
