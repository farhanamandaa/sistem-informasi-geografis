<div class="col-md-2">
		<div class="sidebar">
			<div class="row justify-content-center">
				<form action="{{ url()->current() }}" method="GET">
					<div class="form-group" id="label">
	                    <label for="title">Kategori : </label>
	                    @foreach ($showCategory as $category)
	                     	 
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="{{ $category->id }}" name="categories[]">
							<label class="form-check-label" for="defaultCheck1">
								{{ $category->name }}
							</label>
						</div>

	                     @endforeach
						
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Cari</button>
						</div>

                    </div>
				</form>
			</div>
		</div>
</div>