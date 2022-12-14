<div class="col-lg-7 position-relative z-index-2">
          <div class="card card-plain mb-0">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
      <label class="">Referral link&nbsp;&nbsp;</label>              
<div class="input-group" >
        <input type="text" class="form-control" value="{{ URL::to('/register?ref='.auth()->user()->username) }}" disabled>
    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
