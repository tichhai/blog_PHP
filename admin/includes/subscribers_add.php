

<main class="d-flex jutify-content-end" style="margin-left:20%;width:100%;margin-right:2%;margin-top:100px">
    <div class="container">
        <div class="row justify-content-center">
                <div class="msg" id="msg"></div>
                <div class="card shadow-lg border-0 rounded-lg ">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Send mail to all subscribers</h3></div>
                    <div class="card-body">
                        <form method="post" action="index.php?page=subscribers_add">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="title" id="title" placeholder="Enter title"/>
                                <label >Subject</label>
                            </div>
                            <div class="form-floating mb-3">
                                <label >Content</label>
                                <textarea name="content" id="content" placeholder="Enter title"></textarea>
                            </div>
                            <button onclick="sendMail()" type="button" class="btn btn-sm btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</main>