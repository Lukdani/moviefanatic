<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/moviefanatic/api/addMovie.php">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add movie</h5>
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
                                    <label for="createdDate">Creation date</label>
                                    <input type="date" name="data[createdDate]" id="createdDate"
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
                                    <select name="data[actors][]" class="form-select"
                                        aria-label="multiple select example" multiple>
                                        <option value="Brad Pitt">Brad Pitt</option>
                                        <option value="George Clooney">George Clooney</option>
                                        <option value="George Clooney">Julia Roberts</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="director">Director</label>
                                    <input type="text" name="data[director]" id="director" placeholder="Movie director"
                                        class="form-control" />
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="owner">Studio</label>
                                    <select name="data[owner]" id="owner" class="form-select"
                                        aria-label="multiple select example">
                                        <option selected value="warnerBros">Warner Bros</option>
                                        <option value="universal">Universal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-md-6">
                                    <div class="form-check">
                                        <input name="data[ratedR]" class="form-check-input" type="checkbox" value=""
                                            id="ratedR">
                                        <label class="form-check-label" for="ratedR">
                                            Rated R
                                        </label>
                                    </div>

                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="movieImg">Movie URL</label>
                                    <input type="text" name="data[movieImg]" id="movieImg" placeholder="Image URL"
                                        class="form-control" />
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
document.querySelector("#createdDate").value = new Date();
</script>
</div>