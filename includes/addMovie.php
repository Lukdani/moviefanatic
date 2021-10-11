<!-- Modal -->
<div class="modal fade" id="addMovieModal" tabindex="-1" role="dialog" aria-labelledby="addMovieModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/moviefanatic/api/addMovie.php" enctype="multipart/form-data">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMovieModal">Add movie</h5>
                    <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row bg-dark">
                        <div class="col-12 ">
                            <div class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="movieName">Movie name</label>
                                    <input type="text" name="data[movieName]" id="movieName" placeholder="Movie name"
                                        class="form-control" />
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="movieCreatedDate">Creation date</label>
                                    <input type="date" name="data[movieCreatedDate]" id="movieCreatedDate"
                                        placeholder="Creation date" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="movieDescription">Movie description price</label>
                                <textarea name="data[movieDescription]" id="movieDescription"
                                    placeholder="Movie description" class="form-control">
    </textarea>

                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="movieActors">actors</label>
                                    <select id="actorsSelect" name="data[movieActors][]" class="form-select"
                                        aria-label="multiple select example" multiple>
                                        <!--<option value="Brad Pitt">Brad Pitt</option>
                                        <option value="George Clooney">George Clooney</option>
                                        <option value="George Clooney">Julia Roberts</option>-->
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="director">Director</label>
                                    <select id="directorSelect" name="data[movieDirector]" class="form-select"
                                        aria-label="multiple select example"></select>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="owner">Studio</label>
                                    <select id="studioSelect" name="data[movieStudio]" class="form-select"
                                        aria-label="multiple select example">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-md-6">
                                    <div class="form-check">
                                        <input name="data[movieRatedR]" class="form-check-input" type="checkbox"
                                            value="1" id="ratedR">
                                        <label class="form-check-label" for="ratedR">
                                            Rated R
                                        </label>
                                    </div>

                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="movieImg">Movie image</label>
                                    <input type="file" name="movieImg" id="movieImg" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnSubmit" data-bs-toggle="modal"
                        data-bs-target="#avatar">
                        Add movie
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!--
<div class="modal fade" id="avatar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Movie added!</h5>
            </div>

            <div class="modal-body">
                <p>Thank you so much for helping us add to our ever growing MovieFanatic &trade; movie database.
                    <br> As a token of our appreciation, you get the chance to win 2 blu-ray dvd's of James Camerons
                    2009 smash-hit "Avatar".
                    <br> All you need to do is enter your e-mail adress and your CPR-number, down below. Then you could
                    be the lucky winner of the 2 "blue"-ray copies
                    of the first movie in the Avatar cinematic universe.
                    <br> <i>"I see you Jake Sully"</i>
                </p>

                <label for="modal-mail" class="form-label">Your e-mail</label>
                <input type="email" class="form-control" id="modal-mail" placeholder="e.g. luka7647@edu.easj.dk">

                <label for="modal-cpr" class="form-label">Your CPR-number</label>
                <input type="number" class="form-control" id="modal-cpr" placeholder="e.g. 231045-0637">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Submit to win Avatar on blu-ray</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>-->

<script>
document.querySelector("#movieCreatedDate").valueAsDate = new Date();
</script>
<script type="module" src="./scripts/addMovie.js"></script>