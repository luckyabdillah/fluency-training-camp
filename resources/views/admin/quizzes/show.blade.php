@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Quiz</h5>
            <button class="btn btn-primary btn-add mb-3 me-1">Add Question</button>
            <a href="/admin/quizzes" class="btn btn-dark mb-3 me-1">Back</a>
            <form action="/admin/quizzes/{{ $quiz->uuid }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="course_title" class="form-label">Course</label>
                        <input type="text" class="form-control" name="course_title" id="course_title" value="{{ $course->title }}" disabled>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" rows="2" name="description" id="description" placeholder="Description" autocomplete="off" required maxlength="255">{{ old('description', $quiz->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="minimum_score" class="form-label">Minimum Score <span class="text-danger">(0 - 100)</span></label>
                        <input type="number" min="0" max="100" step="0.1" class="form-control @error('minimum_score') is-invalid @enderror" name="minimum_score" id="minimum_score" placeholder="Minimum Score" value="{{ old('minimum_score', $quiz->minimum_score) }}" autocomplete="off" required>
                        @error('minimum_score')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="time_limit" class="form-label">Time Limit (minutes)</label>
                        <input type="number" min="0" step="1" class="form-control @error('time_limit') is-invalid @enderror" name="time_limit" id="time_limit" placeholder="Time Limit" value="{{ old('time_limit', $quiz->time_limit) }}" autocomplete="off" required>
                        @error('time_limit')
                            <div class="invalid-feedback text-start">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <a href="/admin/quizzes/{{ $quiz->uuid }}/results" class="btn btn-info">See results</a>
                    <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap mb-0 align-middle">
                    <thead class="text-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Question</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($questions->count())
                            @foreach ($questions as $question)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-wrap" style="min-width: 150px;">{{ $question->question }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-edit" data-uuid="{{ $question->uuid }}" data-question="{{ $question->question }}">
                                            <i class="ti ti-edit"></i>
                                        </button>
                                        <form action="/admin/quizzes/{{ $quiz->uuid }}/questions/{{ $question->uuid }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-delete">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="3">No question found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Question Modal -->
    <div class="modal fade" id="questionModal" tabindex="-1" aria-hidden="true"  data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="questionModalLabel"></h1>
                </div>
                <form action="/admin/quizzes/{{ $quiz->uuid }}/questions" method="post" id="questionModalForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="question" class="form-label">Question</label>
                            <input type="text" class="form-control" name="question" id="question" placeholder="Question" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="options[0][id]">
                            <label for="options[0][option_text]" class="form-label">Option 1</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="options[0][option_text]" id="options[0][option_text]" placeholder="Option 1" required autocomplete="off">
                                <select name="options[0][is_correct]" id="options[0][is_correct]" class="form-select" required>
                                    <option value="0">False</option>
                                    <option value="1">True</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="options[1][id]">
                            <label for="options[1][option_text]" class="form-label">Option 2</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="options[1][option_text]" id="options[1][option_text]" placeholder="Option 2" required autocomplete="off">
                                <select name="options[1][is_correct]" id="options[1][is_correct]" class="form-select" required>
                                    <option value="0">False</option>
                                    <option value="1">True</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="options[2][id]">
                            <label for="options[2][option_text]" class="form-label">Option 3</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="options[2][option_text]" id="options[2][option_text]" placeholder="Option 3" required autocomplete="off">
                                <select name="options[2][is_correct]" id="options[2][is_correct]" class="form-select" required>
                                    <option value="0">False</option>
                                    <option value="1">True</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="options[3][id]">
                            <label for="options[3][option_text]" class="form-label">Option 4</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="options[3][option_text]" id="options[3][option_text]" placeholder="Option 4" required autocomplete="off">
                                <select name="options[3][is_correct]" id="options[3][is_correct]" class="form-select" required>
                                    <option value="0">False</option>
                                    <option value="1">True</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                        <button type="button" class="btn btn-dark btn-cancel" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const quiz = @json($quiz)

        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault()
            $('#questionModalLabel').text('Add New Question')

            $('#questionModalForm').attr('action', `/admin/quizzes/${quiz.uuid}/questions`)

            $('#question').val('')

            for (let i = 0; i < 4; i++) {
                document.querySelector(`input[name="options[${i}][id]"]`).value = ''
                document.querySelector(`input[name="options[${i}][option_text]"]`).value = ''
                document.querySelector(`select[name="options[${i}][is_correct]"]`).value = '0'
            }
            
            $('#questionModal').modal('show')
        })

        async function getQuestionOptions(uuid) {
            try {
                const response = await fetch(`/admin/questions/${uuid}/get-options`)

                if (!response.ok) {
                    throw new Error(response.statusText || 'Failed to fetch data')
                }

                const options = await response.json()

                if (!options.data || options.data.length === 0) {
                    throw new Error('No data available')
                }

                return options.data
            } catch (error) {
                console.error('Fetch error: ', error)
                throw error
            }
        }

        $(document).on('click', '.btn-edit', async function(e) {
            e.preventDefault()
            $('#questionModalForm').prepend('@method("put")')
            $('#questionModalLabel').text('Edit Question')
            
            const questionUuid = $(this).data('uuid')
            const questionText = $(this).data('question')

            $('#question').val(questionText)

            $('#questionModalForm').attr('action', `/admin/quizzes/${quiz.uuid}/questions/${questionUuid}`)

            try {
                const options = await getQuestionOptions(questionUuid)
                options.forEach((option, i) => {
                    document.querySelector(`input[name="options[${i}][id]"]`).value = option.id
                    document.querySelector(`input[name="options[${i}][option_text]"]`).value = option.option_text
                    document.querySelector(`select[name="options[${i}][is_correct]"]`).value = option.is_correct
                })
            } catch (error) {
                console.error('Error: ', error)
                Swal({
                    title: 'Oops..',
                    text: 'An error occured, please contact Administrator',
                    type: 'error'
                })
            }

            $('#questionModal').modal('show')
        })

        document.querySelector('#questionModal').addEventListener('hidden.bs.modal', function(e) {
            e.preventDefault()
            const modal = e.target
            modal.querySelector('input[name="_method"][value="put"]').remove()
        })
    </script>
@endpush