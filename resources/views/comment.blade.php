<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Táo non</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{asset('css/cmt.css')}}" />

    <link
        rel="stylesheet"
        href="{{asset('assets/icon/themify-icons-font/themify-icons/themify-icons.css')}}"
    />
</head>
<body>
<div class="card">

    <div class="row">

        <div class="col-2">


            <img src="{{ Avatar::create(session()->get('full_name'))->toBase64() }}" width="70" class="rounded-circle mt-2">


        </div>
        <form action="{{route('comment.process',$id)}}" method="post">
            @csrf
        <div class="col-12">

            <div class="comment-box ml-2">

                <h4>Đánh giá và góp ý</h4>

                <div class="rating">
                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                </div>

                <div class="comment-area">

                    <label for="comment"></label><textarea class="form-control" placeholder="Góp ý cho chúng tôi để cải thiện chất lượng phục vụ nhé!!!" rows="5" name="comment"></textarea>

                </div>

                <div class="comment-btns mt-2">

                    <div class="row">

                        <div class="col-6">


                        </div>

                        <div class="col-6">

                            <div class="pull-right">

                                <button type="submit" class="btn btn-success send btn-sm">Send <i class="fa fa-long-arrow-right ml-1"></i></button>

                            </div>

                        </div>

                    </div>

                </div>


            </div>

        </div>

        </form>
    </div>

</div><script>
    const modalEl = document.querySelector(".modal-js")
    const rateBtnEl = document.querySelector(".order-item__rate")

    const controlBackEl = document.querySelector(".modal__control-back")
    const controlSubmitEl = document.querySelector(".modal__control-submit")
    const modalStarsEl = document.querySelectorAll(".rate__star-each")
    const openModal = function () {
        modalEl.classList.add("open")
    }
    const closeModal = function () {
        if(modalEl.classList.contains("open"))
        {
            modalEl.classList.remove("open")

        }
    }
    rateBtnEl.addEventListener("click", function() {
        modalEl.classList.add("open")

    })
    controlBackEl.addEventListener("click", closeModal)
    controlSubmitEl.addEventListener("click", closeModal)
</script>
</body>
</html>
