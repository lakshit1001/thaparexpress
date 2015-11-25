
<!-- Page Header -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">What do you want to sell? </h1>
  </div>
</div>
<!-- /.row -->

<!-- Projects Row -->
<div class="row">
  <div class="col-sm-9">
  <form class="form-horizontal" method="post" action="selling.php">
    <fieldset>

      <!-- Form Name -->
      <legend>Sell Your Stuff</legend>

      <!-- Multiple Radios -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="buy">Choose here</label>
        <div class="col-md-4">
          <div class="radio">
            <label for="buy-0">
              <input name="category" id="buy-0" value="books" checked="checked" type="radio">
              category
            </label>
          </div>
          <div class="radio">
            <label for="buy-1">
              <input name="category" id="buy-1" value="drafters" type="radio">
              Drafters
            </label>
          </div>
          <div class="radio">
            <label for="buy-2">
              <input name="category" id="buy-2" value="calculators" type="radio">
              Calculators
            </label>
          </div>
          <div class="radio">
            <label for="buy-3">
              <input name="category" id="buy-3" value="courts" type="radio">
              Lab Courts
            </label>
          </div>
          <div class="radio">
            <label for="buy-4">
              <input name="category" id="buy-4" value="dresses" type="radio">
              Workshop Dress
            </label>
          </div>
          <div class="radio">
            <label for="buy-5">
              <input name="category" id="buy-5" value="fans" type="radio">
              Fans
            </label>
          </div>
          <div class="radio">
            <label for="buy-6">
              <input name="category" id="buy-6" value="cycles" type="radio">
              Cycles
            </label>
          </div>
          <div class="radio">
            <label for="buy-7">
              <input name="category" id="buy-7" value="novels" type="radio">
              Novels
            </label>
          </div>
          <div class="radio">
            <label for="buy-8">
              <input name="category" id="buy-8" value="others" type="radio">
              Others
            </label>
          </div>
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="name">Name</label>
        <div class="col-md-4">
          <input id="name" name="name" placeholder="Thomas Finney" class="form-control input-md" type="text">

        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="price">Price</label>
        <div class="col-md-4">
          <input id="price" name="price" placeholder="250" class="form-control input-md" required="" type="text">
          <span class="help-block">Come on, thoda kam lagao.</span>
        </div>
      </div>

      <!-- Multiple Radios (inline) -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="radio">Condition</label>
        <div class="col-md-4">
          <label class="radio-inline" for="radio-0">
            <input name="condi" id="radio-0" value="Brand New" checked="checked" type="radio">
            Brand New
          </label>
          <label class="radio-inline" for="radio-1">
            <input name="condi" id="radio-1" value="Occaisonaly Used" type="radio">
            Occaisonaly Used
          </label>
          <label class="radio-inline" for="radio-2">
            <input name="condi" id="radio-2" value="Little Old" type="radio">
            Little Old
          </label>
          <label class="radio-inline" for="radio-3">
            <input name="condi" id="radio-3" value="Super Old" type="radio">
            Super Old
          </label>
        </div>
      </div>

      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="button"></label>
        <div class="col-md-4">
          <button id="button" name="button" class="btn btn-primary">Sell</button>
        </div>
      </div>

    </fieldset>
  </form>
</div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Info</h3>
      </div>
      <div class="panel-body">
        <p>
        Your item will be first reviewed then listed. We will try to make this process as fast as possible.
        </p>

      </div>
    </div>
  </div>

</div>
