<?php

namespace App\Controller;

use App\Core\{Request, Response};
use App\Model\Page as PageModel;
use App\Http\Resource\Page as PageResource;
use App\Validation\Page\StoreValidator;
use DateTime;

class PageController extends BaseController
{
    public function show(): Response
    {
        $format = 'Y-m-d H:i:s';
        $date = DateTime::createFromFormat($format, '2022-01-01 02:32:12');

        $page = PageModel::create([
            'name' => 'test',
            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
            'startedAt' => $date,
            'createdAt' => $date
        ]);

        return Response::json(PageResource::map($page));
    }

    public function store(Request $request): Response
    {
        $this->validator = new StoreValidator($request->all());
        if (!$this->validator->validate()) {
            return Response::json($this->validator->getErrors(), 400);
        }

        $page = PageModel::create($this->validator->validated());

        return Response::json(PageResource::map($page), 201);
    }
}