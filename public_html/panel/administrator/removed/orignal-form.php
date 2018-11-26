
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Form Stuff</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="m-heading-1 border-green m-bordered">
                        <h3>jQuery Validation Plugin</h3>
                        <p> This jQuery plugin makes simple clientside form validation easy, whilst still offering plenty of customization options. For more info please check out
                            <a class="btn red btn-outline" href="http://jqueryvalidation.org" target="_blank">the official documentation</a>
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered" id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Validation States</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="#" class="form-horizontal">
                                        <div class="form-body">
                                            <h3 class="form-section">Basic validation States</h3>
                                            <div class="form-group has-warning">
                                                <label class="control-label col-md-3" for="inputWarning">Input with warning</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="inputWarning" />
                                                    <span class="help-block"> Something may have gone wrong </span>
                                                </div>
                                            </div>
                                            <div class="form-group has-error">
                                                <label class="control-label col-md-3" for="inputError">Input with error</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="inputError" />
                                                    <span class="help-block"> Please correct the error </span>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label col-md-3" for="inputSuccess">Input with success</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="inputSuccess" /> </div>
                                            </div>
                                            <h3 class="form-section">Validation States With Icons</h3>
                                            <div class="form-group has-warning">
                                                <label class="control-label col-md-3">Input with warning</label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-exclamation tooltips" data-original-title="please write a valid email"></i>
                                                        <input type="text" class="form-control" /> </div>
                                                </div>
                                            </div>
                                            <div class="form-group has-error">
                                                <label class="control-label col-md-3">Input with error</label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-warning tooltips" data-original-title="please write a valid email"></i>
                                                        <input type="text" class="form-control" /> </div>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label col-md-3">Input with success</label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-check tooltips" data-original-title="success input!"></i>
                                                        <input type="text" class="form-control" /> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <button type="button" class="btn default">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Basic Validation</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent red btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                            <label class="btn btn-transparent red btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="#" id="form_sample_1" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="name" data-required="1" class="form-control" /> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input name="email" type="text" class="form-control" /> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">URL
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input name="url" type="text" class="form-control" />
                                                    <span class="help-block"> e.g: http://www.demo.com or http://demo.com </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Number
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input name="number" type="text" class="form-control" /> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Digits
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input name="digits" type="text" class="form-control" /> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Credit Card
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input name="creditcard" type="text" class="form-control" />
                                                    <span class="help-block"> e.g: 5500 0000 0000 0004 </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Occupation&nbsp;&nbsp;</label>
                                                <div class="col-md-4">
                                                    <input name="occupation" type="text" class="form-control" />
                                                    <span class="help-block"> optional field </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Select
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="select">
                                                        <option value="">Select...</option>
                                                        <option value="Category 1">Category 1</option>
                                                        <option value="Category 2">Category 2</option>
                                                        <option value="Category 3">Category 5</option>
                                                        <option value="Category 4">Category 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Multi Select
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="select_multi" multiple>
                                                        <option value="Category 1">Category 1</option>
                                                        <option value="Category 2">Category 2</option>
                                                        <option value="Category 3">Category 3</option>
                                                        <option value="Category 4">Category 4</option>
                                                        <option value="Category 5">Category 5</option>
                                                    </select>
                                                    <span class="help-block"> select max 3 options, min 1 option </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Input Group
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="input_group" placeholder="Email Address"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Validation Using Icons</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn green btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Option 1</a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">Option 2</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Option 3</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Option 4</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="#" id="form_sample_2" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                            <div class="form-group  margin-top-20">
                                                <label class="control-label col-md-3">Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" name="name" /> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" name="email" /> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">URL
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" name="url" /> </div>
                                                    <span class="help-block"> e.g: http://www.demo.com or http://demo.com </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Number
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" name="number" /> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Digits
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" name="digits" /> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Credit Card
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" name="creditcard" /> </div>
                                                    <span class="help-block"> e.g: 5500 0000 0000 0004 </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <button type="button" class="btn default">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Advance Validation</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="#" id="form_sample_3" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="name" data-required="1" class="form-control" /> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Email Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                                        <input type="email" name="email" class="form-control" placeholder="Email Address"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Occupation&nbsp;&nbsp;</label>
                                                <div class="col-md-4">
                                                    <input name="occupation" type="text" class="form-control" /> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Select2 Dropdown
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control select2me" name="options2">
                                                        <option value="">Select...</option>
                                                        <option value="Option 1">Option 1</option>
                                                        <option value="Option 2">Option 2</option>
                                                        <option value="Option 3">Option 3</option>
                                                        <option value="Option 4">Option 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Datepicker</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly name="datepicker">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <!-- /input-group -->
                                                    <span class="help-block"> select a date </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Membership
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="mt-radio-list" data-error-container="#form_2_membership_error">
                                                        <label class="mt-radio">
                                                            <input type="radio" name="membership" value="1" /> Fee
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="membership" value="2" /> Professional
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div id="form_2_membership_error"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Services
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="mt-checkbox-list" data-error-container="#form_2_services_error">
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" value="1" name="service" /> Service 1
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" value="2" name="service" /> Service 2
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" value="3" name="service" /> Service 3
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <span class="help-block"> (select at least two) </span>
                                                    <div id="form_2_services_error"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Markdown</label>
                                                <div class="col-md-9">
                                                    <textarea name="markdown" data-provide="markdown" rows="10" data-error-container="#editor_error"></textarea>
                                                    <div id="editor_error"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">WYSIHTML5 Editor
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="wysihtml5 form-control" rows="6" name="editor1" data-error-container="#editor1_error"></textarea>
                                                    <div id="editor1_error"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group last">
                                                <label class="control-label col-md-3">CKEditor
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="ckeditor form-control" name="editor2" rows="6" data-error-container="#editor2_error"></textarea>
                                                    <div id="editor2_error"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <button type="button" class="btn default">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        <?php include('form-js.php');?>
   