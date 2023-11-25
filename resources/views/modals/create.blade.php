<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="createForm" method="POST" action="/pracownicy/create">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create Worker</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label for="imie">Imię:</label>
                    <input type="text" id="imie" name="imie" required>
                    <p class="text-danger error-message" id="imie-error"></p>

                    <label for="nazwisko">Nazwisko:</label>
                    <input type="text" id="nazwisko" name="nazwisko" required>
                    <p class="text-danger error-message" id="imie-error"></p>

                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" required>
                    <!-- Error messages for email -->
                    <p class="text-danger error-message" id="email-error"></p>

                    <label for="dieta">Preferencje żywieniowe:</label>
                    <select class="form-control" id="dieta" name="dieta" required>
                        @foreach(\App\Enums\Dieta::getAllValues() as $dietaValue)
                            <option value="{{ $dietaValue }}">{{ ucfirst($dietaValue) }}</option>
                        @endforeach
                    </select>
                    <p class="text-danger error-message" id="dieta-error"></p>


                    <label for="firma">Nazwa firmy:</label>
                    <select class="form-control" id="firma" name="firma" required>
                        @foreach(\App\Enums\Firmy::getAllValues() as $firmaValue)
                            <option value="{{ $firmaValue }}">{{ ucfirst($firmaValue) }}</option>
                        @endforeach
                    </select>
                    <p class="text-danger error-message" id="firma-error"></p>

                    <label for="telefon_1">Telefon:</label>
                    <input type="text" id="telefon_1" name="telefon_1" required>
                    <p class="text-danger error-message" id="telefon_1-error"></p>

                    <label for="telefon_2">Drugi Telefon:</label>
                    <input type="text" id="telefon_2" name="telefon_2">
                    <p class="text-danger error-message" id="telefon_2-error"></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
