   <!-- searchbox -->
   <section class="inner-search-form">
       <div class="container">
           <div class="form justify-content-center">
               <form action="{{ route('search') }}" method="get" class="row ">

                   <div class="from-group col-sm-5 ">
                       <input type="text" class="form-control" name="title" id="job_title"
                           placeholder="What: Job Title Keywords, Company" />
                   </div>
                   <div class="from-group col-sm-5 ">
                       <input type="text" class="form-control" name="location" id="job_location"
                           placeholder="Where: City, Country">
                   </div>
                   <div class="from-group col-sm-2 ">
                       <button class="d-btn bg-green" id="searchSubmit" type="submit"><i class="fa fa-search"></i>
                           search
                       </button>
                   </div>
               </form>
           </div>
       </div>
   </section>
   <!-- search ends -->
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
       crossorigin="anonymous"></script>
   <script>
       if ($('#job_title').val() == 0 && $('#job_location').val() == 0) {
           //    $('#searchSubmit').appendClass('disable')
           $('#searchSubmit').prop('disabled', true);
       }

       $('#job_title').on('keyup', function() {
           $('#searchSubmit').prop('disabled', false);
       })

       $('#job_location').on('keyup', function() {
           $('#searchSubmit').prop('disabled', false);
       })

   </script>
