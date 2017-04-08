@extends('layouts.queen')

@section('content')

            <div class="col-md-12">
                <div class="grid-body">
                
                   <div class="container">

                    <div class="col-lg-6">
                      
                      <h4>Account Plan:</h4>
                        <p>Subscription</p>
                        
                      <h4>Year:</h4>
                        <p>2016</p>
                        
                    <p>You started your membership with Frenvid on 2016-08-31</p>
            
                      
                      <div class="button-set">
                        <button class="btn btn-danger btn-cons" type="button">Update your payment info</button>
                       
                      </div>
                      <br>
                      <hr>
                      <h4>Change your password</h4>
                        <div class="form-group">
                            <label class="form-label">actual password</label>
                            <div class="controls">
                              <input type="text" class="form-control">
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="form-label">New Password</label>
                            <div class="controls">
                              <input type="password" class="form-control">
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="form-label">Confirm new password</label>
                            <div class="controls">
                              <input type="text" class="form-control">
                            </div>
                      </div>
                     <div class="button-set">
                        <button class="btn btn-danger btn-cons" type="button">Change my password</button>
                       
                      </div>
                      
                      
                      <br>
                      <hr>
                      <h4>Profile picture</h4>
                      <form method="POST" action="" accept-charset="UTF-8" class="p-t-15 ng-pristine ng-valid" id="profileUpload" novalidate="novalidate" enctype="multipart/form-data"><input name="_token" type="hidden" value="TEOiiNg6EiE65MTaPg8yH2TYDQQS6Xo4qBn48GXJ">

                                        <div class="alert alert-danger" role="alert" id="alertProfile" style="display: none;">
                                          <button class="close" data-dismiss="alert"></button>
                                          <p><strong>Error</strong></p>
                                          <p id="errorProfile">hola</p>
                                        </div>

                                            <div class="paddidata-ng-5 b-rad-lg">
                                                <div class="row">
                                                    <div class="col-sm-12 p-t-10 p-l-10 p-r-10">
                                                        <div class="form-group form-group-default required">
                                                            <label>Profile</label>
                                                             <input class="required" accept="image/*" required="true" name="profile" type="file">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                                                                                                                                                                        
                                                <button class="btn btn-danger btn-cons m-t-10 m-b-50" id="changeProfileButton" type="submit">Change profile</button>
                                            </div>
                                        </form>
                    </div>
                    
                    <div class="col-lg-5">            
                     <h4>Connect with facebook</h4>
                        <p>Extend the experience to your friends and loved ones on facebook. Invite them to follow you on Frenvid.</p>
                     <div class="button-set">
                        <button class="btn btn-danger btn-cons" type="button">Connect with Facebook</button>
                       
                      </div>
                     <br>
                     <hr>
                     <h4>Cancel Membership</h4>
                        <p>You can cancel your account anytime. No commitments, no contract.</p>
                        <div class="button-set">
                        <button class="btn btn-danger btn-cons" type="button">Cancel Membership</button>
                       
                      </div>
                    </div>
                  </div>
                </div>
           
            </div>

@endsection
