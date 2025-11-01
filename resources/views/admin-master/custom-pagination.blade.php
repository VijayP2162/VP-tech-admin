 <div class="col-sm-auto">
                                        <ul class="pagination m-0">
                                            {{-- Previous Page Link --}}
                                            @if ($Registeration_List->onFirstPage())
                                            <li class="page-item disabled">
                                                <span class="page-link"><i class="bx bx-left-arrow-alt"></i></span>
                                            </li>
                                            @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $Registeration_List->previousPageUrl() }}"><i class="bx bx-left-arrow-alt"></i></a>
                                            </li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach ($Registeration_List->getUrlRange(1, $Registeration_List->lastPage()) as $page => $url)
                                            <li class="page-item {{ $Registeration_List->currentPage() == $page ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @if ($Registeration_List->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $Registeration_List->nextPageUrl() }}"><i class="bx bx-right-arrow-alt"></i></a>
                                            </li>
                                            @else
                                            <li class="page-item disabled">
                                                <span class="page-link"><i class="bx bx-right-arrow-alt"></i></span>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>