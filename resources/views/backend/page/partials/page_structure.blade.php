<div class="modal fade" id="addStructure" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 ps-4 bg-soft-success">
                <h5 class="modal-title" id="myModalLabel">Page Structure</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <h4 class="modal-title mb-3">Structure Your Page Sections By Dragging Them</h4>

                <div id="items-container">
                    <ul class="ui-sortable" id="sortable">
                        {{-- list of section with their names and images are added here via jquery--}}

                    </ul>
                </div>

                <div class="text-center mb-3 mt-4">
                    <button id="submit_page_detail" class="btn btn-success w-sm">{{ $button }} Page</button>
                </div>
            </div>

        </div>
    </div>
</div>
