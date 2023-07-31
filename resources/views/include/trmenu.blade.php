<a href="{{ route('training_plans.index') }}" >
    List ||  
</a>
<a href="{{ route('training_plans.edit', $training_id) }}">
    Training  ||  
</a>
<a href="{{ route('training_plan_pesertas.index', $training_id) }}" >
    Peserta  ||
 </a>
 <a href="{{ route('training_costs_index.index', $training_id)  }}" >
    Biaya  ||  
 </a>
 <a href="{{ route('training_intrainers_index.index', $training_id) }}">
    Trainer  ||  
</a>
<a href="{{ route('files.indexfile', ($training_id)) }}">
    Files  ||  
</a>