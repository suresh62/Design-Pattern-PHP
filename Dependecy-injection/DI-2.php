<?php

/*What we've done here is create a dependency between the TextEditor and the SpellChecker. Spellchecker tightly dependent on Texteditor*/
public class TextEditor
{
    private SpellChecker checker;
    public TextEditor()
    {
        checker = new SpellChecker();
    }
}


/*But what the actual implementation with DI can be.Here We have Texteditor but with spellchecker injected into it.
And client has control over which spellchecker to use since we are using interface. */

public class TextEditor
{
    private ISpellChecker checker;
    public TextEditor(ISpellChecker checker)
    {
        this.checker = checker;
    }
}

