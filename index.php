    <!DOCTYPE html>
    <html lang="da">

    <head>
        <meta charset="utf-8" />

        <title>MovieFanatic</title>
        <meta name="robots" content="All" />
        <meta name="author" content="Udgiver" />
        <meta name="copyright" content="Information om copyright" />
        <?php include "./includes/dependencies.php"; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="https://cdn.tiny.cloud/1/ahizxth4ug3hvkg2d8fl0o9hwzcvl47nf2m6d3s8f2kf8uh9/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
        <script>
        tinymce.init({
            selector: '#movieDescription'
        });
        </script>
    </head>

    <body class="bg-dark text-light">

        <?php include "./includes/navbar.php"; ?>
        <?php include "./includes/addMovie.php"; ?>

        <div id="addedMovieModal" class="customModal bg-success">
            <div style="text-align:right;"><button class="btn btn-secondary" id="closeModalButton"><i
                        class="fas fa-times"></i>
                </button>
            </div>
            <h3>Movie added!</h3>
            <p>Thank you so much for helping us add to our ever growing MovieFanatic &trade; movie database.
                <br> As a token of our appreciation, you get the chance to win 2 blu-ray dvd's of James Camerons
                2009 smash-hit "Avatar".
                <br><br> All you need to do is enter your e-mail adress and your CPR-number, down below. Then you could
                be the lucky winner of the 2 "blue"-ray copies
                of the first movie in the Avatar cinematic universe.
                <br><br> <i>"I see you Jake Sully"</i>
            </p>
            <label for="modal-mail" class="form-label">Your e-mail</label>
            <input type="email" class="form-control" id="modal-mail" placeholder="e.g. luka7647@edu.easj.dk">
            <br><br>
            <label for="modal-cpr" class="form-label">Your CPR-number</label>
            <input type="number" class="form-control" id="modal-cpr" placeholder="e.g. 231045-0637">
            <br><br>
            <button type="button" class="btn btn-primary" id="sub">Submit to win Avatar on blu-ray</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="shut">Close</button>
        </div>
        <div id="movies"></div>
        <script type="module" src="./scripts/movie.js"></script>

        <!-- CDNs etc. -->
        <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script>
        const addedMovieModal = document.querySelector("#addedMovieModal");

        const queryString = window.location.search;

        if (queryString) {
            const urlParams = new URLSearchParams(queryString);
            const showModal = !!urlParams.get("showModal");

            const hideModal = () => {
                addedMovieModal.classList.remove("show");
                window.history.pushState({}, document.title, window.location.pathname);
            }

            if (showModal) {
                document.querySelector("#closeModalButton").addEventListener("click", hideModal)
                addedMovieModal.classList.toggle("show");
                setTimeout(() => {
                    hideModal();
                }, 120000);
            }
        }

        const byeModal = () => {
            addedMovieModal.classList.remove("show");
            window.history.pushState({}, document.title, window.location.pathname);
        }

        document.querySelector("#sub").addEventListener("click", byeModal)
        addedMovieModal.classList.toggle("show");

        document.querySelector("#shut").addEventListener("click", byeModal)
        addedMovieModal.classList.toggle("show");

        </script>


    </body>

    </html>