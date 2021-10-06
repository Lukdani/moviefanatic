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
                                            value="" id="ratedR">
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
                    <button type="submit" class="btn btn-primary" id="btnSubmit">
                        Add movie
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
document.querySelector("#movieCreatedDate").valueAsDate = new Date();
</script>
<script type="module" src="./scripts/addMovie.js"></script>
</div>