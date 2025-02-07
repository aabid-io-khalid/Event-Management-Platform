<?php

class SUbscriptions {
    private $studentId;
    private $courseId;
    private $enrollmentDate;

    // A property to store all enrollments
    private static $enrollments = [];

    public function __construct($studentId, $courseId) {
        $this->studentId = $studentId;
        $this->courseId = $courseId;
        $this->enrollmentDate = date("Y-m-d H:i:s");
    }

    // Method to enroll a student in a course
    public static function addEnrollment($studentId, $courseId) {
        foreach (self::$enrollments as $enrollment) {
            if ($enrollment['studentId'] === $studentId && $enrollment['courseId'] === $courseId) {
                echo "Student $studentId is already enrolled in course $courseId.\n";
                return;
            }
        }
        self::$enrollments[] = [
            'studentId' => $studentId,
            'courseId' => $courseId,
            'enrollmentDate' => date("Y-m-d H:i:s")
        ];

        echo "Student $studentId has been enrolled in course $courseId successfully.\n";
    }

    public static function removeEnrollment($studentId, $courseId) {
        foreach (self::$enrollments as $index => $enrollment) {
            if ($enrollment['studentId'] === $studentId && $enrollment['courseId'] === $courseId) {
                unset(self::$enrollments[$index]);
                self::$enrollments = array_values(self::$enrollments);
                echo "Student $studentId has been unenrolled from course $courseId.\n";
                return;
            }
        }

        echo "Enrollment not found for student $studentId in course $courseId.\n";
    }

    public static function getEnrollmentsByStudent($studentId) {
        $studentCourses = array_filter(self::$enrollments, function ($enrollment) use ($studentId) {
            return $enrollment['studentId'] === $studentId;
        });

        if (empty($studentCourses)) {
            echo "No enrollments found for student $studentId.\n";
        } else {
            echo "Enrollments for student $studentId:\n";
            foreach ($studentCourses as $enrollment) {
                echo "- Course ID: {$enrollment['courseId']}, Enrolled On: {$enrollment['enrollmentDate']}\n";
            }
        }
    }
}


// Add enrollments
Enrollment::addEnrollment(1, 101);
Enrollment::addEnrollment(1, 102);
Enrollment::addEnrollment(2, 101);

// Try adding the same enrollment
Enrollment::addEnrollment(1, 101);

// Get enrollments for a student
Enrollment::getEnrollmentsByStudent(1);

// Remove an enrollment
Enrollment::removeEnrollment(1, 101);

// Get enrollments again after removal
Enrollment::getEnrollmentsByStudent(1);

// Try to remove a non-existent enrollment
Enrollment::removeEnrollment(1, 103);
