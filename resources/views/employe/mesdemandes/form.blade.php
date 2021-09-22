
@csrf
<script type="text/javascript"> 
    function GetDays(){
        var dropdt =new Date (document.getElementById("date_fin").value); 
        var pickdt =new Date (document.getElementById("date_debut").value);
        return parseInt((dropdt - pickdt) / (24 * 3600 * 1000)+1);

    }
    function cal(){
        if(document.getElementById("date_fin")){
            document.getElementById("nb_jours").value=GetDays();
        }  
    }
    </script>


<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="date_debut">date_debut</label>
            <input type="date" name="date_debut" value="{{ $demande->date_debut ?? old('date_debut') }}" id="date_debut" class="form-control @error('date_debut') is-invalid @enderror @error('date_debut') is-invalid @enderror" onchange="cal()">
            @error('date_debut')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="date_fin">date_fin</label>
            <input type="date" name="date_fin" value="{{ $demande->date_fin ?? old('date_fin') }}" id="date_fin" class="form-control @error('date_fin') is-invalid @enderror" onchange="cal()">
            @error('date_fin')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="nb_jours">nb_jours</label>
            <input type="text" name="nb_jours" value="{{ $demande->nb_jours ?? old('nb_jours') }}" id="nb_jours" class="form-control @error('nb_jours') is-invalid @enderror" readonly >
            @error('nb_jours')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
    </div>

</div>
<div class="form-group">
    <label for="Raison">raison</label>
    <input type="text" name="Raison" value="{{ $demande->Raison ?? old('Raison') }}" id="Raison" class="form-control @error('raison') is-invalid @enderror" placeholder="raison" >
    @error('raison')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="row">
    <div class="col"><button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i> Save</button></div>
    <div class="col"><button type="reset" class="btn btn-block btn-outline-secondary"><i class="fas fa-window-close"></i> Cancel</button></div>
</div>

  </div>

