<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Appointment;
use App\Models\Stage;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;
use Response;

class CommentController extends AppBaseController
{
    /** @var CommentRepository */
    private $commentRepository;

    public function __construct(CommentRepository $commentRepo)
    {
        $this->commentRepository = $commentRepo;
    }

    /**
     * Display a listing of the Comment.
     *
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $comments = $this->commentRepository->all();

        return view('admin.comments.index')
            ->with('comments', $comments);
    }

    /**
     * Show the form for creating a new Comment.
     *
     * @return Response
     */
    // public function create()
    // {
    //     return view('admin.comments.create', [
    //         'stages' => Stage::all(),
    //         'commentStage' => null,
    //         'comment' => null
    //     ]);
    // }

    /**
     * Store a newly created Comment in storage.
     *
     *
     * @return Response
     */
    public function store(CreateCommentRequest $request, $appointmentId)
    {
        $input = $request->all();
        $appointment = Appointment::where('id', $appointmentId)->with('user')->first();
        $data = array_merge($input, [
            'appointment_id' => $appointment->id,
            'author_id' => auth()->user()->id,
            'user_id' => $appointment->user->id,
            'stage_id' => $request->input('stage_id'),
        ]);
        // dd($data);
        $this->commentRepository->create($data);

        toastr()->timeOut(10000)->addSuccess('Comment saved successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified Comment.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            toastr()->timeOut(10000)->addError('Comment not found');

            return redirect(roleBasedRoute('comments.index'));
        }

        return view('admin.comments.show')->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified Comment.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            toastr()->timeOut(10000)->addError('Comment not found');

            return redirect(roleBasedRoute('comments.index'));
        }

        return view('admin.comments.edit', [
            'comment' => $comment,
            'stages' => Stage::all(),
            'commentStage' => $comment->stage,
        ]);
    }

    /**
     * Update the specified Comment in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateCommentRequest $request)
    {
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            toastr()->timeOut(10000)->addError('Comment not found');

            return redirect(roleBasedRoute('comments.index'));
        }

        $comment = $this->commentRepository->update($request->all(), $id);

        toastr()->timeOut(10000)->addSuccess('Comment updated successfully.');

        return back();
    }

    /**
     * Remove the specified Comment from storage.
     *
     * @param  int  $id
     * @return Response
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            toastr()->timeOut(10000)->addError('Comment not found');

            return redirect(roleBasedRoute('comments.index'));
        }

        $this->commentRepository->delete($id);

        toastr()->timeOut(10000)->addSuccess('Comment deleted successfully.');

        return back();
    }
}
