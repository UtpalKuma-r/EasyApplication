
def text_recogniser(image_path, language_list):

    import easyocr
    reader = easyocr.Reader(language_list)
    result = reader.readtext(image_path)
    return result