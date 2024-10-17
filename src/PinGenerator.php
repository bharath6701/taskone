<?php
namespace Bfg\Task;

class PinGenerator {
    // Method to generate 5 unique valid PINs
    public function generate(): array {
        $pins = [];
        
        while (count($pins) < 5) {
            $pin = $this->generatePin();
            if ($this->isValidPin($pin) && !in_array($pin, $pins)) {
                $pins[] = $pin;
            }
        }
        
        return $pins;
    }

    // Method to generate a random 4-digit PIN
    private function generatePin(): string {
        return str_pad((string)rand(0, 9999), 4, '0', STR_PAD_LEFT);
    }

    // Method to check if a PIN is valid
    private function isValidPin(string $pin): bool {
        // Check for sequential numbers
        if ($this->isSequential($pin)) {
            return false;
        }

        // Check for repeating numbers
        if ($this->isRepeating($pin)) {
            return false;
        }

        // Check for palindrome numbers
        if ($this->isPalindrome($pin)) {
            return false;
        }

        return true;
    }

    // Check if the PIN consists of sequential numbers
    private function isSequential(string $pin): bool {
        return preg_match('/^(0123|1234|2345|3456|4567|5678|6789|9876|8765|7654|6543|5432|4321|3210)$/', $pin);
    }

    // Check if the PIN has repeating numbers
    private function isRepeating(string $pin): bool {
        return preg_match('/^(\\d)(\\1){3}|^(\\d)(\\d)\\2\\1|^(\\d)\\1\\1\\1$/', $pin);
    }

    // Check if the PIN is a palindrome
    private function isPalindrome(string $pin): bool {
        return $pin[0] === $pin[3] && $pin[1] === $pin[2];
    }
}
