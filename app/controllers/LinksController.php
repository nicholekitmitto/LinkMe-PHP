<?php

class LinksController extends BaseController {

  public function postCreate() {

      $validator = Validator::make(Input::all(), Links::$rules);

      if ($validator->passes()) {
        $link = new Links;
        $link->message = Input::get('message');
        $link->link = Input::get('link');
        $link->recipient_id = Input::get('recipient_id');
        $link->sender_id = Auth::user()->id;
        $link->save();

      return Redirect::back()->with('message', 'Your link was sent successfully!');
    } else {
      return Redirect::back()
        ->with('message', 'Sorry! The following errors occured')
        ->withErrors($validator)
        ->withInput();
    }
  }

  public function postViewed($id, $linkid) {
    $link = Links::find($linkid);
    $link->viewed = 1;
    $link->save();

    if ($link) {
      return Redirect::back()->with('message', 'Your link was marked as viewed.');
    } else {
      return Redirect::back()
        ->with('message', 'Woops! Something went wrong!');
    }

  }

  public function postAllViewed($id) {
    $link = DB::table('links')
            ->where('recipient_id', $id)
            ->update(array('viewed' => 1));

    if ($link) {
      return Redirect::back()->with('message', 'Your links were marked as viewed.');
    } else {
      return Redirect::back()
        ->with('message', 'Woops! Something went wrong!');
    }
  }




}
