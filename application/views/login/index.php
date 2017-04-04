<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style type="text/css">
  .vcenter {
    display: inline-block;
    vertical-align: middle;
    float: none;
  }

  .topSpace {
    margin-top: 10px !important;
  }

  .btn-outline-primary {
    color: #0275d8;
    background-image: none;
    background-color: transparent;
    border-color: #0275d8;
    transition: all 2s;
  }
    .btn-outline-primary:hover {
      color: white;
      background-color: #0275d8;
      width: 25%;
    }

  .center {
    text-align: center;
  }

  .form-actions {
    margin: 0;
    background-color: transparent;
    text-align: center;
  }

  .customFormLocation {
    position: relative;
    top: 20%;
  }
 </style>

<body style="background-color: #dfdfdf;">
  <div class="customFormLocation">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <h2 class="text-center" >EZ EMR Login</h2>
        <p>If the login does not work correctly make sure you go to clinic.com/index.php/login </p>
        <?php echo validation_errors(); ?>
      </div>
      <div class="col-md-4"></div>
    </div>
    <?php echo form_open('verifylogin'); ?>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <!-- <label for="username">Username:</label> -->
        <input class="form-control" type="text" size="20" id="username" name="username" placeholder="Username" />
      
        <!-- <label for="password">Password:</label> -->
        <input class="form-control topSpace" type="password" size="20" id="passowrd" name="password" placeholder="Password" />
        <div class="form-actions topSpace">
        <button type="submit" class="btn btn-outline-primary" style="text-align: center;">Login</button>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
    </form>
  </div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
