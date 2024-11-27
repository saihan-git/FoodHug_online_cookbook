@extends('frontend.template')
@section('content')
   
    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="{{ route('index')}}">Home</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container my-md-5">		
        <div class="row pt-4">
            <div class="col-md-3 col-sm-6 my-2">
                <div class="card h-100">
                    <div class="card-body bg-light text-center">
                        <h4><a href="https://goo.gl/maps/msPKL1s93MxxaLLR8" target="_blank"><i class="fas fa-map-marker-alt text-danger"></i></a></h4>
                        <h6 class="text-dark">
                        Address
                        </h6>
                        <small class="text-muted">
                        Myanmar, Shan Township
                        </small> 

                    </div>
                </div>				
            </div>
            <div class="col-md-3 col-sm-6 my-2">
                <div class="card h-100">
                    <a href="tel:09443888882" class="text-decoration-none">
                    <div class="card-body bg-light text-center">
                        <h4><i class="fas fa-phone text-danger"></i></h4>
                        <h6 class="text-dark">
                            Phone
                        </h6>
                        <small class="text-muted">+95983458452</small>
                    </div>
                    </a>
                </div>				
            </div>
            <div class="col-md-3 col-sm-6 my-2">
                <div class="card h-100">
                    <div class="card-body bg-light text-center">
                        <h4><i class="far fa-envelope text-danger"></i></h4>
                        <h6 class="text-dark">
                        Email
                        </h6>
                        <small class="text-muted">example@gmail.com</small> 

                    </div>
                </div>				
            </div>
            <div class="col-md-3 col-sm-6 my-2">
                <div class="card h-100">
                    <div class="card-body bg-light text-center">
                        <h4><i class="far fa-building text-danger"></i></h4>
                        <h6 class="text-dark">
                            Opening Hour
                        </h6>
                        <small class="text-muted">9:00 AM - 8:00 PM</small> 

                    </div>
                </div>				
            </div>            
        </div>        
    </div>

    <div class="container my-5">
        <h3>Get In Touch</h3>
        <div class="row">
            
            <div class="col-md-6">                
                <form action="#" method="post">
                <div class="row">
                    <div class="col-md-6 my-2">
                        <label class="form-control-label" for="name">
                            Name
                        </label>
                        <input type="text" name="name" class="form-control">
                        
                    </div>
                    <div class="col-md-6 my-2">
                        <div class="form-group">
                            <label class="form-control-label">
                                Email
                            </label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <div class="form-group">
                            <label class="form-control-label">
                                Subject
                            </label>
                            <input type="text" name="subject" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 my-2 mb-4 pb-2">
                        <label class="form-control-label">
                            Message
                        </label>
                        <textarea name="message" class="form-control h-100" ></textarea>
                                                
                    </div>
                    

                    <div class=" col-3  col-md-2 my-4">                       
                        <div class="d-grid gap-2">
                            <input type="submit" name="" value="Send" class="btn btn-outline-danger"> 
                        </div>                                               
                    </div>
                </div>
            </form>

        </div>

            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.8642410839916!2d96.16675631486866!3d16.833089688413036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c193ee0415ba1f%3A0x8bca8b62ca5ab372!2sClassic%20Export%20Clothes!5e0!3m2!1sen!2smm!4v1650259627344!5m2!1sen!2smm" width="100%" height="90%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                
            </div>
        </div>
        
    </div>
@endsection

@section('script')

@endsection
