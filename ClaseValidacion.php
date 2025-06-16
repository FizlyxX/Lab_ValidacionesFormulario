<?php
class FormValidator {
    private $data;
    private $requiredFields = [];

    public function __construct($postData) {
        $this->data = $postData;
    }
    public function setRequiredFields(array $fields) {
        $this->requiredFields = $fields;
    }
    public function validate() {
        // Common validation rules
        $this->validateRequiredFields();
        $this->validateEmailFormat();
        $this->validatePhoneFormat();
        // Add more validation methods as needed
    }

    private function validateRequiredFields() {
        // Check if required fields are present
        foreach ($this->requiredFields as $field) {
            if (empty(trim($this->data[$field] ?? ''))) {
                throw new Exception("{$field} is required.");
            }
        }
    }

    private function validateEmailFormat() {
        // Check if email field is in a valid format
        if (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }
    }

    private function validatePhoneFormat() {
        // Phone format: 123-456-7890
        $phone = $this->data['phone'] ?? '';
        if (!preg_match('/^\d{3}-\d{3}-\d{4}$/', $phone)) {
            throw new Exception("Invalid phone format. Usa 123-456-7890.");
        }
    }

    // Define other validation methods...
}
?>
