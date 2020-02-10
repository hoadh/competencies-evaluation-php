<?php

use Model\Outcome;

class CommonService {
    private $programRepository;
    private $clazzRepository;
    private $studentsRepository;
    private $templatesRepository;
    private $outcomeRepository;
    private $evaluationRepository;
    private $evaluationDetailRepository;

    public function __construct($programRepository, $clazzRepository, $studentsRepository, $templatesRepository,
                                $outcomeRepository, $evaluationRepository, $evaluationDetailRepository) {
        $this->programRepository = $programRepository;
        $this->clazzRepository = $clazzRepository;
        $this->studentsRepository = $studentsRepository;
        $this->templatesRepository = $templatesRepository;
        $this->outcomeRepository = $outcomeRepository;
        $this->evaluationRepository = $evaluationRepository;
        $this->evaluationDetailRepository = $evaluationDetailRepository;
    }

    public function getProgramById($programId) {
        return $this->programRepository->get($programId);
    }
    public function deleteProgramById($programId) {
        return $this->programRepository->delete($programId);
    }
    public function updateProgramById($programId, $program) {
        return $this->programRepository->update($programId, $program);
    }
    public function createProgram($program) {
        return $this->programRepository->create($program);
    }
    public function getAllPrograms() {
        return $this->programRepository->getAll();
    }

    public function getClazzById($clazzId) {
        return $this->clazzRepository->get($clazzId);
    }
    public function deleteClazzById($clazzId) {
        return $this->clazzRepository->delete($clazzId);
    }
    public function updateClazzById($clazzId, $clazz) {
        return $this->clazzRepository->update($clazzId, $clazz);
    }
    public function createClazz($clazz) {
        return $this->clazzRepository->create($clazz);
    }
    public function getAllClazzes() {
        return $this->clazzRepository->getAll();
    }

    public function getAllStudentsByClazzId($clazzId) {
        return $this->studentsRepository->getAllByClazzId($clazzId);
    }
    public function createManyStudents($students) {
        return $this->studentsRepository->createMany($students);
    }

    public function getTemplateById($templateId) {
        return $this->templatesRepository->get($templateId);
    }
    public function deleteTemplateById($templateId) {
        return $this->templatesRepository->delete($templateId);
    }
    public function updateTemplateById($templateId, $template) {
        return $this->templatesRepository->update($templateId, $template);
    }
    public function createTemplate($template) {
        return $this->templatesRepository->create($template);
    }
    public function getAllTemplates() {
        return $this->templatesRepository->getAll();
    }

    /* Outcomes */
    public function getAllOutcomes($template_id) {
        return $this->outcomeRepository->getAll($template_id);
    }
    public function getAllOutcomesByParentId($template_id, $parent_id) {
        return $this->outcomeRepository->getAllByParentId($template_id, $parent_id);
    }
    public function createOutcomeHeader($template_id, $headerTitle) {
        $header = new Outcome($template_id, $headerTitle, "", false);
        return $this->outcomeRepository->create($header);
    }
    public function createOutcomeSubheader($template_id, $subheaderTitle, $headerId) {
        $subheader = new Outcome($template_id, $subheaderTitle, $headerId, false);
        return $this->outcomeRepository->create($subheader);
    }
    public function createOutcome($outcome) {
        return $this->outcomeRepository->create($outcome);
    }
    public function createManyOutcomes($template_id, $parent_id, $outcomes) {
        return $this->outcomeRepository->createMany($template_id, $parent_id, $outcomes);
    }

    public function createEvaluation($evaluation) {
        return $this->evaluationRepository->create($evaluation);
    }
    public function getAllEvaluationByStudentId($student_id) {
        return $this->evaluationRepository->getAllByStudentId($student_id);
    }
    public function createManyEvaluationDetails($evaluationDetails) {
        return $this->evaluationDetailRepository->createMany($evaluationDetails);
    }
}