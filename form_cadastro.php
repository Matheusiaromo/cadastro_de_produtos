            <form method="POST" action="cadastrar_action.php">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome">
                </div>
                <div class="mb-3">
                    <label for="valor" class="form-label">valor</label>
                    <input type="number" class="form-control" name="valor" step=".01" id="valor">
                </div>
                <label for="" class="mb-2 form-label">Perecível</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="perecivel" value="1" id="true">
                    <label class="form-check-label" for="true">
                        Sim
                    </label>    
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="perecivel" value="0" id="false" checked>
                    <label class="form-check-label" for="false">
                        Não
                    </label>
                </div>
                <label for="" class="mb-2 mt-3 form-label">Categoria</label>
                <div class="form-check">
                    <input class="form-check-input" checked type="radio" name="categoria" value="alimentacao" id="alimentacao">
                    <label class="form-check-label" for="alimentacao">
                        Alimentação
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="categoria" value="vestimenta" id="vestimenta">
                    <label class="form-check-label" for="vestimenta">
                        Vestimenta
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="categoria" value="outros" id="outros">
                    <label class="form-check-label" for="outros">
                        Outros
                    </label>
                </div>
                
                <button type="submit" nome="cadastrar" class="btn btn-primary mt-3">Cadastrar</button>
            </form>