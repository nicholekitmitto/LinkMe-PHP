<?php

class LinksController extends BaseController {

public function postCreate() {

    $link = new Links;
    $link->message = Input::get('message');
    $link->link = Input::get('link');
    $link->recipient_id = Input::get('recipient_id');
    $link->save();

  if ($link) {
    return Redirect::back()->with('message', 'Your link was sent successfully!');
  } else {
    return Redirect::back()
      ->with('message', 'Sorry! The following errors occured')
      ->withInput();
  }
}


}
