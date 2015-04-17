<?php
/**
 * Custom error handler for console commands.
 */
class GotsError {

	public static function handleError($code, $description, $file = null, $line = null, $context = null) {
		list(, $level) = ErrorHandler::mapErrorCode($code);
		$log_levels = array(
			LOG_EMERG,
			LOG_ALERT,
			LOG_CRIT,
			LOG_ERR
		);
		if(in_array($level, $log_levels)){
			return ErrorHandler::handleError(
				$code,
				$description,
				$file,
				$line,
				$context
			);
		}

	}
}
